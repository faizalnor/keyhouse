<template>
  <q-layout view="hHh Lpr fFf">
    <!-- Be sure to play with the Layout demo on docs -->
    <div class="rateBG" style="min-height: 200px">
      <div class="row containerX justify-evenly">
        <h5 class="n text-bold text-center poppins">
          Penilaian Anda, <br />Keutamaan Kami
        </h5>

        <div class="col-10 col-md-12 text-center">
          Kami mengharap anda dapat meluangkan beberapa minit untuk mengisi
          Borang Penilaian Pelanggan ini. Data ini akan kami gunakan untuk
          keperluan pasukan kami untuk menaikkan prestasi kami.
        </div>
      </div>
    </div>
    <div class="shapedividers_com-8540" style="height: 50px"></div>
    <q-form @submit="handleSubmit">
      <div class="containerX q-pa-md">
        <div class="text-subtitle2 n poppins justify-evenly q-pb-md">
          Maklumat Servis
        </div>
        <div class="row q-col-gutter-y-md" v-for="n in list" :key="n.pid">
          <div class="col-12">
            <q-input
              outlined
              v-model="n.pl_agencyName"
              label="Nama Agensi"
              color="indigo-10"
              stack-label
              type="text"
              readonly
              input-class="text-bold"
            />
          </div>
          <div class="col-12">
            <q-input
              outlined
              v-model="n.pl_title"
              label="Urusan"
              color="indigo-10"
              stack-label
              type="text"
              readonly
              input-class="text-bold"
            />
          </div>
          <div class="col-12">
            <q-input
              outlined
              v-model="n.pl_date"
              stack-label
              color="indigo-10"
              type="date"
              label="Tarikh"
              readonly
              input-class="text-bold"
            />
          </div>
        </div>
      </div>
      <div class="containerX q-pa-md">
        <div class="text-subtitle2 n poppins justify-evenly q-pb-md">
          Maklumat Responden
        </div>
        <div class="row q-col-gutter-y-md">
          <div class="col-12">
            <q-input
              outlined
              autofocus
              v-model="cl_name"
              stack-label
              color="indigo-10"
              type="text"
              label="Nama Responden"
            />
          </div>
          <div class="col-12">
            <q-input
              outlined
              v-model="cl_type"
              stack-label
              color="indigo-10"
              type="text"
              label="Jawatan"
            />
          </div>
        </div>
      </div>
      <div class="containerX q-pa-md q-gutter-y-md">
        <div class="text-subtitle2 n poppins justify-evenly q-pb-md">
          Nilai Servis Kami
        </div>
        <q-card bordered flat class="col-12">
          <q-card-section>
            <div class="text-subtitle2 n text-bold">Penggunaan Bahasa</div>
            <div class="text-body2">
              Andakah pihak kami menggunakan bahasa yang baik ketika bertutur
              dengan pihak anda?
            </div>
          </q-card-section>

          <q-separator inset />

          <q-card-section>
            <q-rating
              name="bahasa"
              v-model="bahasaRate"
              max="5"
              size="md"
              color="indigo-10"
              icon="stars"
              no
              dimming
            >
              <template v-slot:tip-1>
                <q-tooltip>Sangat Tidak Suka</q-tooltip>
              </template>
              <template v-slot:tip-2>
                <q-tooltip>Tidak Suka</q-tooltip>
              </template>
              <template v-slot:tip-3>
                <q-tooltip>Neutral</q-tooltip>
              </template>
              <template v-slot:tip-4>
                <q-tooltip>Suka</q-tooltip>
              </template>
              <template v-slot:tip-5>
                <q-tooltip>Sangat Suka</q-tooltip>
              </template>
            </q-rating>
          </q-card-section>
        </q-card>
        <q-card bordered flat class="col-12">
          <q-card-section>
            <div class="text-subtitle2 n text-bold">
              Kandungan Bahan dan Penerangan
            </div>
            <div class="text-body2">
              Andakah pihak kami menyampaikan maklumat seperti yang diharapkan?
            </div>
          </q-card-section>

          <q-separator inset />

          <q-card-section>
            <q-rating
              name="bahan"
              v-model="bahanRate"
              max="5"
              size="md"
              color="indigo-10"
              icon="stars"
              no
              dimming
            >
              <template v-slot:tip-1>
                <q-tooltip>Sangat Tidak Suka</q-tooltip>
              </template>
              <template v-slot:tip-2>
                <q-tooltip>Tidak Suka</q-tooltip>
              </template>
              <template v-slot:tip-3>
                <q-tooltip>Neutral</q-tooltip>
              </template>
              <template v-slot:tip-4>
                <q-tooltip>Suka</q-tooltip>
              </template>
              <template v-slot:tip-5>
                <q-tooltip>Sangat Suka</q-tooltip>
              </template>
            </q-rating>
          </q-card-section>
        </q-card>
        <q-card bordered flat class="col-12">
          <q-card-section>
            <div class="text-subtitle2 n text-bold">Soal dan Jawab</div>
            <div class="text-body2">
              Adakah pihak kami dapat menjawab semua pertanyaan pihak anda
              seperti yang diharapkan?
            </div>
          </q-card-section>

          <q-separator inset />

          <q-card-section>
            <q-rating
              name="qna"
              v-model="qnaRate"
              max="5"
              size="md"
              color="indigo-10"
              icon="stars"
              no
              dimming
            >
              <template v-slot:tip-1>
                <q-tooltip>Sangat Tidak Suka</q-tooltip>
              </template>
              <template v-slot:tip-2>
                <q-tooltip>Tidak Suka</q-tooltip>
              </template>
              <template v-slot:tip-3>
                <q-tooltip>Neutral</q-tooltip>
              </template>
              <template v-slot:tip-4>
                <q-tooltip>Suka</q-tooltip>
              </template>
              <template v-slot:tip-5>
                <q-tooltip>Sangat Suka</q-tooltip>
              </template>
            </q-rating>
          </q-card-section>
        </q-card>
        <q-card bordered flat class="col-12">
          <q-card-section>
            <div class="text-subtitle2 n text-bold">Cadangan Tambah Baik</div>
            <div class="text-body2">
              Adakah pihak anda mempunyai cadangan untuk pihak kami tambah baik
              servis kami?
            </div>
          </q-card-section>

          <q-separator inset />

          <q-card-section>
            <q-input
              v-model="tambahbaikRate"
              outlined
              type="textarea"
              label="Cadangan Tambah Baik"
              stack-label
            />
          </q-card-section>
        </q-card>
      </div>
      <div class="containerX q-pa-md text-right">
        <q-btn
          label="Submit"
          type="submit"
          glossy
          color="indigo-10 text-bold"
        />
      </div>
      <div class="q-pa-lg"></div>
    </q-form>
    <!-- (Optional) The Header -->
    <q-footer
      bordered
      class="bg-white text-grey-7 no-shadow"
      style="margin-bottom: 0px"
    >
      <q-toolbar>
        <span class="text-overline absolute-center">
          <q-img
            src="../assets/img/csm.svg"
            height="30px"
            width="170px"
            alt="Classkit"
          />
        </span>
      </q-toolbar>
    </q-footer>
    <q-page-container>
      <!-- This is where pages get injected -->
      <router-view />
    </q-page-container>
  </q-layout>
</template>

<script>
import { api } from "boot/axios";
import { LoadingBar } from "quasar";
import { ref } from "vue";
import { useMeta } from "quasar";
LoadingBar.setDefaults({
  color: "indigo-10",
  size: "3px",
  position: "top",
});
export default {
  name: "LayoutName",

  props: {
    id: { type: String, required: true },
  },
  setup() {
    const title = ref("Customer Rating");

    useMeta(() => {
      return {
        title: title.value,
      };
    });
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
      cl_name: "",
      cl_type: "",
      bahasaRate: ref(0),
      bahanRate: ref(0),
      qnaRate: ref(0),
      tambahbaikRate: "",
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
  methods: {
    handleSubmit() {
      api
        .post("addNewProject.php", {
          pl_agencyNames: this.pl_agencyName.cl_name,
          pl_titles: this.pl_title,
          pl_dates: this.pl_date,
          bahasaRates: this.bahasaRate,
          bahanRates: this.bahanRate,
          qnaRates: this.qnaRate,
          tambahbaikRates: this.tambahbaikRate,
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
