import { defineStore } from "pinia";
import { api } from "../boot/axios";
export const agencyStore = defineStore("dataAgency", {
  state: () => ({
    agencies: [],
  }),
  getters: {
    getAgencies(state) {
      return state.agencies;
    },
  },
  actions: {
    async fetchAgencies() {
      try {
        const data = await api.get("agencyList.php");
        this.agencies = data.data;
      } catch (error) {
        alert(error);
        console.log(error);
      }
    },
    async UpdateConfirmed(id) {
      try {
        api.post("updateConfirmed.php?id=" + this.id);
      } catch (error) {}
    },
    async updateCompleted(id) {
      api.post("updateCompleted.php?id=" + this.id, {}).then(function () {});
    },

    async UpdateCanceled(id) {
      api.post("updateCanceled.php?id=" + this.id, {}).then(function () {});
    },
  },
});
