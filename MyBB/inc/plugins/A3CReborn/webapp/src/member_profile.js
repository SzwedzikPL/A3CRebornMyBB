import Vue from 'vue';

Vue.config.productionTip = false;

new Vue({
  el: '#member_profile',
  data: () => ({}),
  render: h => h('span', ['Profil użytkownika']),
});
