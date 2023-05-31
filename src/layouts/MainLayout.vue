<template>
  <q-layout view="hHh Lpr fFf">
    <q-header bordered class="bg-white text-grey-8 q-py-xs">
      <q-toolbar>
        <q-btn flat @click="drawer = !drawer" dense icon="menu" />
        <div class="q-pr-xs absolute-center">
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
      id="drawer"
      v-model="drawer"
      dense
      bordered
      show-if-above
      :width="200"
      :breakpoint="651"
      class="bg-white q-pr-md"
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
            active-class="bg-teal-1 text-teal radius"
          >
            <q-item-section avatar>
              <q-icon name="library_add" />
            </q-item-section>
            <q-item-section> New Rating</q-item-section>
          </q-item>

          <q-item
            clickable
            v-ripple
            to="/admin/RatingList"
            active-class="bg-teal-1 text-teal radius"
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
            width="170px"
            alt="Classkit"
          />
        </span>
      </q-toolbar>
    </q-footer>
    <q-page-container class="bg-white">
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
