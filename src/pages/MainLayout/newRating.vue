<template>
  <q-page padding>
    <div class="container">
      <q-toolbar>
        <q-icon size="xs" name="library_add" class="q-pb-xs text-teal" />&nbsp;
        <div class="text-h6 q-pb-xs text-teal">{{ this.$route.name }}</div>
      </q-toolbar>

      <q-card flat>
        <q-card-section>
          <div class="q-gutter-lg">
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

            <q-select
              outlined
              v-model="agencyList"
              use-input
              color="teal"
              input-debounce="0"
              label="Agency Name"
              :options="options"
              option-value="cl_name"
              option-label="cl_name"
              @filter="filterFn"
              hint="Minimum 2 character"
              behavior="menu"
            >
              <template v-slot:no-option>
                <q-item>
                  <q-item-section class="text-grey">
                    No results
                  </q-item-section>
                </q-item>
              </template>
            </q-select>
            <q-input outlined name="text" color="teal" label="Scope Title" />
          </div>
        </q-card-section>
      </q-card>
    </div>
  </q-page>
</template>

<script>
import { ref } from "vue";
import { api } from "boot/axios";

const stringOptions = [];

export default {
  setup() {
    const options = ref(stringOptions);
    return {
      agencyList: ref(null),
      api,
      options,

      filterFn(val, update, abort) {
        if (val.length < 1) {
          abort();
          return;
        }
        update(() => {
          const needle = val.toLowerCase();
          options.value = stringOptions.filter(
            (v) => v.toLowerCase().indexOf(needle) > -1
          );
        });
      },
    };
  },
  data: function () {
    return {
      location: null,
      gettingLocation: false,
      errorStr: null,
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
  },
  created: function () {
    this.fetchAllData();
  },
  methods: {
    fetchAllData: function () {
      api.get("agencyList.php").then((response) => {
        this.stringOptions = response.data;
        console.log(this.stringOptions);
      });
    },
  },
};
</script>
