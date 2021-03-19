<template>
  <div>
    <!-- No field to show -->
  </div>
</template>

<script>
export default {
  props: [
    'modelValue',
    'field',
    'errors',
    'formMeta',
    'model',
    'action'
  ],

  emits: [
    'update:modelValue'
  ]
}
</script>
