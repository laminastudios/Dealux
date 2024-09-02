<template>
  <button type="submit" class="submit-button">{{ label }}</button>
</template>

<script>
export default {
  props: {
    label: {
      type: String,
      default: 'Submit',
    },
  },
};
</script>
