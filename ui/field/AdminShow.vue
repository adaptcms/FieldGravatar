<template>
  <div v-if="email" class="h-10 w-10">
    <Gravatar :email="email" class="h-10 w-10 rounded-full" />
  </div>
</template>

<script>
import { get } from 'lodash'
import Gravatar from '@/Adaptcms/FieldGravatar/ui/components/Gravatar'

export default {
  props: [
    'value',
    'field',
    'model',
    'package',
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
        emailField = this.package.package_fields.find(row => row.id === emailFieldId)
      }

      if (emailField) {
        value = (typeof this.model[emailField.column_name] !== 'undefined' ? this.model[emailField.column_name] : null)
      }

      return value
    }
  }
}
</script>
