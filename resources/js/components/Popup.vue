<template>
  <div class="popup" v-if="visible">
    <div class="popup-content">
      <span class="close" @click="closePopup">&times;</span>
      <slot></slot>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      visible: true,
    };
  },
  methods: {
    closePopup() {
      this.visible = false;
    },
  },
};
</script>
