<template>
  <q-layout view="hHh Lpr fFf">
    <!-- Be sure to play with the Layout demo on docs -->
    <div class="rateBG" style="min-height: 200px">
      <div class="row containerX justify-evenly" padding>
        <div class="col-10 col-md-12">
          <h5 class="n text-bold text-center poppins">
            Pendapat anda, keutamaan kami!!
          </h5>
        </div>
        <div class="col-10 col-md-12 text-justify">
          Kami mengharapkan anda dapat meluangkan beberapa minit untuk mengisi
          Kaji Selidik Kepuasan Pelanggan ini. Data ini akan kami gunakan untuk
          keperluan pasukan kami untuk menaikkan prestasi kami.
        </div>
      </div>
    </div>
    <div class="shapedividers_com-8540" style="height: 50px"></div>

    <div class="containerX" padding>
      <div class="row containerX justify-evenly">
        <div class="col-10 col-md-12 text-justify text-h6 q-gutter-md">
          Maklumat Perjumpaan
          <q-input outlined v-model="text" label="Outlined" readonly />
          <q-input outlined v-model="text" label="Outlined" />
          <q-input outlined v-model="text" label="Outlined" />
          <q-input outlined v-model="text" label="Outlined" />
          <q-input outlined v-model="text" label="Outlined" />
        </div>
      </div>
    </div>
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
export default {
  // name: 'LayoutName',

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
      text: "",
    };
  },
};
</script>
