<template>
  <div v-if="email" class="h-10 w-10">
    <Gravatar :email="email" class="h-10 w-10 rounded-full" />
  </div>
</template>

<script>
import { get } from 'lodash'
import Gravatar from 'vue-gravatar'

export default {
  props: [
    'value',
    'field',
    'model',
    'module',
    'action'
  ],

  components: {
    Gravatar
  },

  computed: {
    email () {
      let value = null
      let emailField = get(this.field, 'meta.emailField', null)

      if (emailField) {
        value = (typeof this.model[emailField] !== 'undefined' ? this.model[emailField] : null)
      }

      return value
    }
  }
}
</script>
