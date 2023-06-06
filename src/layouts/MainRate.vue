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
              input-class="text-bold"
              readonly
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
              input-class="text-bold"
              readonly
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
              input-class="text-bold"
              readonly
            />
          </div>
        </div>
      </div>
      <div class="containerX q-pa-md">
        <div class="text-subtitle2 n poppins justify-evenly q-pb-md">
          Maklumat Responden
        </div>
        <div class="row q-col-gutter-y-md q-col-gutter-x-md">
          <div class="col-12">
            <q-input
              outlined
              autofocus
              v-model="res_name"
              stack-label
              color="indigo-10"
              type="text"
              label="Nama Responden"
            />
          </div>
          <div class="col-12">
            <q-input
              outlined
              v-model="res_pos"
              stack-label
              color="indigo-10"
              type="text"
              label="Jawatan"
            />
          </div>
          <div class="col-12">
            <q-input
              outlined
              v-model="ipAddress"
              stack-label
              color="indigo-10"
              type="text"
              label="IP Address"
              readonly
            />
          </div>
          <div class="col-6">
            <q-input
              outlined
              v-model="deviceTypeValue"
              stack-label
              color="indigo-10"
              type="text"
              label="Device Type"
              readonly
              class=""
            />
          </div>
          <div class="col-6">
            <q-input
              outlined
              v-model="deviceModelValue"
              stack-label
              color="indigo-10"
              type="text"
              label="Device Model"
              readonly
              class=""
            />
          </div>

          <div class="col-6">
            <q-input
              outlined
              v-model="lat"
              stack-label
              color="indigo-10"
              type="text"
              label="Location: Latitude"
              readonly
            />
          </div>
          <div class="col-6">
            <q-input
              outlined
              v-model="lon"
              stack-label
              color="indigo-10"
              type="text"
              label="Location: Longitude"
              readonly
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
              Adakah pihak kami menggunakan bahasa yang baik ketika bertutur
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
              Adakah pihak kami menyampaikan maklumat seperti yang diharapkan?
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

    <q-dialog v-model="dialog" persistent>
      <q-card class="my-card">
        <q-card-section class="bg-indigo-10 text-white">
          <q-toolbar class="text-white">
            <q-btn flat round dense icon="info" />
            <q-toolbar-title> Privasi Data </q-toolbar-title>
          </q-toolbar>
        </q-card-section>
        <q-card-section>
          <span
            >Kami menyimpan data anda untuk tujuan statistik prestasi kami. Data
            yang kami kumpul adalah
            <b>
              Nama, Jawatan, <i>IP Address</i>, <i>Device Type</i>,
              <i>Device Model</i> dan Lokasi.</b
            >
            Klik setuju untuk teruskan atau klik tidak untuk hanya memberikan
            Nama dan Jawatan.</span
          >
        </q-card-section>
        <q-separator />
        <q-card-actions align="right">
          <q-btn flat glossy class="bg-grey-3 text-grey-10" @click="closeDialog"
            >Tidak</q-btn
          >
          <q-btn
            flat
            glossy
            class="bg-indigo-10 text-white text-bold"
            @click="acceptPDPA"
            >Setuju</q-btn
          >
        </q-card-actions>
      </q-card>
    </q-dialog>
    <q-dialog v-model="afterSubmit" persistent>
      <q-card class="my-card">
        <q-card-section class="bg-teal-6 text-white">
          <q-toolbar class="text-white">
            <q-btn flat round dense icon="check_circle" />
            <q-toolbar-title> Data telah dikemaskini </q-toolbar-title>
          </q-toolbar>
        </q-card-section>
        <q-card-section>
          <span
            >Kami telah menerima respon dari pihak anda. Terima kasih kerana
            dapat meluangkan masa untuk memberi penilaian ke atas servis kami.
            Sehingga jumpa lagi!</span
          >
        </q-card-section>
        <q-separator />
        <q-card-actions align="right">
          <q-btn
            flat
            glossy
            class="bg-teal text-white text-bold"
            @click="tutupInfo"
            >Tutup</q-btn
          >
        </q-card-actions>
      </q-card>
    </q-dialog>

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
    const dialog = ref(true);
    const afterSubmit = ref(false);

    useMeta(() => {
      return {
        title: title.value,
      };
    });
    return {
      api,
      dialog,
      afterSubmit,
    };
  },
  data: function () {
    return {
      list: [],
      gettingLocation: false,
      errorStr: null,
      pl_agencyName: "",
      pl_title: "",
      pl_date: "",
      res_name: "",
      res_pos: "",
      deviceModelValue: "",
      deviceTypeValue: "",
      ipAddress: "",
      lat: null,
      lon: null,
      bahasaRate: ref(0),
      bahanRate: ref(0),
      qnaRate: ref(0),
      tambahbaikRate: ref(""),
      rt_setuju: "",
    };
  },
  created() {
    this.deviceTypeValue = this.getDeviceType();
    this.deviceModelValue = this.getDeviceModel();
  },
  mounted() {},
  methods: {
    tutupInfo() {
      window.open("https://www.centurysoftware.com.my", "_self");
    },
    handleSubmit() {
      api
        .post("submitRate.php", {
          pl_id: this.id,
          pl_agencyNames: this.pl_agencyName,
          pl_titles: this.pl_title,
          pl_dates: this.pl_date,
          res_name: this.res_name,
          res_pos: this.res_pos,
          rt_lat: this.lat,
          rt_lon: this.lon,
          rt_ipAddress: this.ipAddress,
          rt_deviceType: this.deviceTypeValue,
          rt_deviceModel: this.deviceModelValue,
          rt_bahasaRates: this.bahasaRate,
          rt_bahanRates: this.bahanRate,
          rt_qnaRates: this.qnaRate,
          rt_tambahbaikRates: this.tambahbaikRate,
          rt_setuju: this.rt_setuju,
        })
        .then((response) => {
          const newID = response.data;
        })
        .finally(() => (this.afterSubmit = true));
    },

    getLocation() {
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
          this.lat = pos.coords.latitude;
          this.lon = pos.coords.longitude;
        },
        (err) => {
          this.gettingLocation = false;
          this.errorStr = err.message;
        }
      );
    },
    detectDevice() {
      this.deviceTypeValue = this.getDeviceType();
      this.deviceModelValue = this.getDeviceModel();
    },
    getDeviceType() {
      if (this.isDesktopMac()) {
        return "Desktop Mac";
      } else if (this.isDesktopWindows()) {
        return "Desktop Windows";
      } else if (this.$q.platform.is.desktop) {
        return "Desktop";
      } else if (this.$q.platform.is.mobile) {
        return "Mobile";
      } else if (this.$q.platform.is.tablet) {
        return "Tablet";
      } else {
        return "Unknown";
      }
    },
    isDesktopMac() {
      return (
        navigator.platform.toUpperCase().indexOf("MAC") >= 0 &&
        window.matchMedia("(pointer: fine)").matches
      );
    },
    isDesktopWindows() {
      return (
        navigator.platform.toUpperCase().indexOf("WIN") >= 0 &&
        window.matchMedia("(pointer: fine)").matches
      );
    },
    getDeviceModel() {
      if (this.$q.platform.is.desktop) {
        if (this.isDesktopMac()) {
          return "macOS";
        } else if (this.isDesktopWindows()) {
          return "Windows";
        } else {
          return "Unknown";
        }
      } else if (this.$q.platform.is.ios) {
        return "iPhone";
      } else {
        return "Android";
      }
    },
    getIPAddress() {
      api
        .get("https://api.ipify.org?format=json")
        .then((response) => {
          this.ipAddress = response.data.ip;
        })
        .catch((error) => {
          console.error(error);
        });
    },
    acceptPDPA() {
      this.rt_setuju = "Ya";
      this.dialog = false;
      this.getDetailRate();
      this.getIPAddress();
      this.detectDevice();
      this.getLocation();
    },
    closeDialog() {
      this.dialog = false;
      this.getDetailRate();
      this.lon = "-";
      this.lat = "-";
      this.deviceModelValue = "-";
      this.deviceTypeValue = "-";
      this.ipAddress = "-";
      this.rt_setuju = "Tidak";
    },

    getDetailRate() {
      api
        .get("detailRate.php?id=" + this.id)
        .then((response) => {
          const list = response.data;
          this.list = response.data;
          this.pl_agencyName = this.list[0].pl_agencyName;
          this.pl_title = this.list[0].pl_title;
          this.pl_date = this.list[0].pl_date;
        })
        .catch((error) => {
          console.error("Error:", error);
        });
    },
  },
};
</script>
