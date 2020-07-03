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
      let emailFieldId = get(this.field, 'meta.emailField', null)
      let emailField = null

      if (emailFieldId) {
        emailField = this.module.module_fields.find(row => row.id === emailFieldId)
      }

      if (emailField) {
        value = (typeof this.model[emailField.column_name] !== 'undefined' ? this.model[emailField.column_name] : null)
      }

      return value
    }
  }
}
</script>
