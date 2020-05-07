import Vue from 'vue';

Vue.config.productionTip = false;

new Vue({
  el: '#shoutbox',
  data: () => ({}),
  render: h => h('span', ['Shoutbox']),
});
