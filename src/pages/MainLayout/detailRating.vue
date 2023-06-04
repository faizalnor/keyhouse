<template>
  <q-page padding>
    <div v-for="n in list" :key="n.pid">
      <div class="container">
        <q-card flat bordered>
          <q-card-section>
            <q-toolbar>
              <q-icon
                size="xs"
                name="library_add"
                class="q-pb-xs text-teal"
              />&nbsp;
              <div class="text-h6 q-pb-xs text-teal">
                {{ this.$route.name }}
              </div>
            </q-toolbar>

            <div class="row justify-evenly">
              <div class="col-12 col-md-7 q-gutter-md">
                <div class="col-12">
                  <q-input
                    outlined
                    v-model="n.pl_agencyName"
                    label="Agency Name"
                    color="teal"
                    stack-label
                    type="text"
                    readonly
                  />
                </div>
                <div class="col-12">
                  <q-input
                    outlined
                    v-model="n.pl_title"
                    label="Project Title"
                    color="teal"
                    stack-label
                    type="text"
                    readonly
                  />
                </div>

                <div class="col-12">
                  <q-input
                    outlined
                    v-model="n.pl_date"
                    stack-label
                    color="teal"
                    type="date"
                    label="Date"
                    readonly
                  />
                </div>
              </div>
              <div class="col-12 col-md-2 q-gutter-md">
                <div class="col-12 col-md-2">
                  <q-card
                    flat
                    bordered
                    style="overflow: hidden; min-width: fit-content"
                  >
                    <q-card-section>
                      <div class="justify-center">
                        <VueQRCodeComponent
                          :text="qrText"
                          :size="150"
                          color="teal"
                          bg-color="white"
                          error-level="H"
                          class="text-center"
                        />
                      </div>
                    </q-card-section>
                  </q-card>
                </div>
              </div>
            </div>
          </q-card-section>
        </q-card>
      </div>
    </div>
  </q-page>
</template>

<script>
import { api } from "boot/axios";
import VueQRCodeComponent from "vue-qrcode-component";
export default {
  components: {
    VueQRCodeComponent,
  },
  // name: 'PageName',
  props: {
    id: { type: String, required: true },
  },

  setup() {
    return {
      api,
    };
  },

  data: function () {
    return {
      list: "",
      pl_agencyName: "",
      pl_title: "",
      pl_date: "",
    };
  },
  mounted() {
    api
      .get("detailRate.php?id=" + this.id)
      .then((response) => {
        this.list = response.data;
      })
      .catch((error) => {
        console.error("Error:", error);
      });
  },
  computed: {
    qrText() {
      return `https://pslab.mindabytes.my/#/MainRate/${this.id}`;
    },
  },
};
</script>
