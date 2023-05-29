<template>
  <q-page padding>
    <div class="container">
      <q-toolbar>
        <q-icon
          size="xs"
          name="add_box"
          class="q-pb-md material-icons-two-tone"
        />&nbsp;
        <div class="text-h6 q-pb-md">{{ this.$route.name }}</div>
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
              v-model="model"
              use-input
              input-debounce="0"
              label="Agency Name"
              :options="options"
              @filter="filterFn"
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
            <q-input outlined v-model="text" label="Scope Title" />
          </div>
        </q-card-section>
      </q-card>
    </div>
  </q-page>
</template>

<script>
export default {
  data: function () {
    return {
      location: null,
      gettingLocation: false,
      errorStr: null,
    };
  },
  created() {
    //do we support geolocation
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
  },
};
</script>
