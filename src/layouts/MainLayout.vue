<template>
  <q-layout view="hHh Lpr fFf">
    <q-header bordered class="bgMain">
      <q-toolbar>
        <q-btn flat @click="drawer = !drawer" dense icon="menu" />
        <div class="q-pr-xs">
          <q-img
            src="../assets/img/logo.svg"
            :style="[
              !miniState
                ? { height: '30px', width: '88.6px' }
                : { height: '30px', width: '88.6px' },
            ]"
            alt="Classkit"
          />
        </div>
        <div class="text-weight-medium q-pa-md"></div>
      </q-toolbar>
    </q-header>
    <q-drawer
      v-model="drawer"
      bordered
      dense
      show-if-above
      :width="200"
      :breakpoint="651"
      class="bg-white text-grey-7"
    >
      <q-scroll-area class="fit">
        <q-list>
          <q-item-label class="q-pa-md text-overline"
            >Customer Rating</q-item-label
          >
          <q-item
            clickable
            v-ripple
            to="/admin/newRating"
            active-class="active-link"
          >
            <q-item-section avatar>
              <q-icon name="add" />
            </q-item-section>
            <q-item-section> New Rating</q-item-section>
          </q-item>

          <q-item
            clickable
            v-ripple
            to="/admin/RatingList"
            active-class="active-link"
          >
            <q-item-section avatar>
              <q-icon name="star" />
            </q-item-section>
            <q-item-section>Rating List</q-item-section>
          </q-item>
        </q-list>
      </q-scroll-area>
    </q-drawer>

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
            width="166px"
            alt="Classkit"
          />
        </span>
      </q-toolbar>
    </q-footer>
    <q-page-container class="bodyColor">
      <router-view />
    </q-page-container>
  </q-layout>
</template>

<script>
import { ref } from "vue";
import { useMeta } from "quasar";

export default {
  setup() {
    const miniState = ref(true);
    const title = ref("PSLab by Presales for CSM");

    useMeta(() => {
      return {
        title: title.value,
      };
    });

    return {
      drawer: ref(false),
      miniState,
    };
  },
  methods: {},
  computed: {
    headerTitle() {
      return this.$route.name;
    },
  },
};
</script>
