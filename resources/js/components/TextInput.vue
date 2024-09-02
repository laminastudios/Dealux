<template>
  <div class="text-input">
    <label>{{ label }}</label>
    <input type="text" v-model="value" />
  </div>
</template>

<script>
export default {
  props: {
    label: String,
    modelValue: String,
  },
  computed: {
    value: {
      get() {
        return this.modelValue;
      },
      set(value) {
        this.$emit('update:modelValue', value);
      },
    },
  },
};
</script>
