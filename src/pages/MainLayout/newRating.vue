<template>
  <q-page padding>
    <div class="container">
      <q-card flat bordered>
        <q-card-section>
          <q-toolbar>
            <q-icon
              size="xs"
              name="library_add"
              class="q-pb-xs text-teal"
            />&nbsp;
            <div class="text-h6 q-pb-xs text-teal">{{ this.$route.name }}</div>
          </q-toolbar>
          <q-form @submit="handleSubmit">
            <div class="row q-gutter-md justify-evenly">
              <div class="col-8">
                <div v-if="errorStr">
                  Sorry, but the following error occurred: {{ errorStr }}
                </div>

                <div v-if="gettingLocation">
                  <i>Getting your location...</i>
                </div>

                <div v-if="location">
                  Your location data is {{ location.coords.latitude }},
                  {{ location.coords.longitude }}
                </div>
              </div>

              <div class="col-8">
                <q-select
                  clearable
                  clear-icon="close"
                  outlined
                  stack-label
                  v-model="pl_agencyName"
                  color="teal"
                  :options="options"
                  option-value="cl_name"
                  option-label="cl_name"
                  label="Agency Name"
                  @filterFn="filterFn"
                  :rules="[(val) => !!val || 'Field is required']"
                >
                  <template v-slot:no-option>
                    <q-item>
                      <q-item-section class="text-grey">
                        No results
                      </q-item-section>
                    </q-item>
                  </template>
                </q-select>
              </div>
              <div class="col-8">
                <q-input
                  outlined
                  v-model="pl_title"
                  label="Project Title"
                  color="teal"
                  stack-label
                  type="text"
                  :rules="[(val) => !!val || 'Field is required']"
                />
              </div>

              <div class="col-8">
                <q-input
                  outlined
                  v-model="pl_date"
                  stack-label
                  color="teal"
                  type="date"
                  label="Date"
                  :rules="[(val) => !!val || 'Field is required']"
                />
              </div>
              <div class="col-8">
                <div>
                  <q-btn label="Submit" type="submit" glossy color="teal" />
                </div>
              </div>
            </div>
          </q-form>
        </q-card-section>
      </q-card>
    </div>
  </q-page>
</template>

<script>
import { api } from "boot/axios";

export default {
  setup() {
    return {
      api,
    };
  },
  data: function () {
    return {
      location: null,
      gettingLocation: false,
      errorStr: null,
      options: [],
      pl_agencyName: "",
      pl_title: "",
      pl_date: "",
      newID: "",
    };
  },
  created() {
    //start geolocation
    if (!("geolocation" in navigator)) {
      this.errorStr = "Geolocation is not available.";
      return;
    }
    this.gettingLocation = true;
    // get position
    navigator.geolocation.getCurrentPosition(
      (pos) => {
        this.gettingLocation = false;
        this.location = pos;
      },
      (err) => {
        this.gettingLocation = false;
        this.errorStr = err.message;
      }
    );

    //end geolocation

    api
      .get("agencyList.php")
      .then((response) => {
        this.options = response.data;
      })
      .catch((error) => {
        console.error("Error:", error);
      });
  },
  computed: {},
  methods: {
    filterFn(val, update) {
      if (val.length < 2) {
        update([]);
        return;
      }

      const filteredOptions = this.options.filter((option) =>
        option.cl_name.toLowerCase().includes(val.toLowerCase())
      );
      update(filteredOptions);
    },
    handleSubmit() {
      api
        .post("addNewProject.php", {
          pl_agencyNames: this.pl_agencyName.cl_name,
          pl_titles: this.pl_title,
          pl_dates: this.pl_date,
        })
        .then((response) => {
          const newID = response.data;
          console.log(newID);
          window.location.href = `#/admin/detailRate/${newID}`;
        });
    },
  },
};
</script>
