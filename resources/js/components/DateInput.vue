<template>
  <div class="date-input">
    <label>{{ label }}</label>
    <input type="date" v-model="value" />
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
