<template>
  <div class="flex-col">
    <label for="form-emailField" class="text-lg font-normal text-gray-700 w-auto">
      Email Field
      <span class="text-sm text-red-500 font-bold">*</span>
    </label>

    <SelectField
      id="form-emailField"
      :errors="errors"
      v-model="emailField"
    >
      <template v-slot:options>
        <option
          v-for="row in fields"
          :key="`email-field-${row.id}`"
          :value="row.id"
        >
          {{ row.name }}
        </option>
      </template>
    </SelectField>
  </div>
</template>

<script>
import { get } from 'lodash'
import SelectField from '@/Adaptcms/Base/ui/components/Form/SelectField'

export default {
  props: [
    'value',
    'field',
    'package',
    'errors',
    'fields'
  ],

  components: {
    SelectField
  },

  watch: {
    value (newVal, oldVal) {
      if ((newVal !== oldVal) && get(newVal, 'emailField', null)) {
        this.emailField = newVal.emailField
      }
    },

    emailField (newVal, oldVal) {
      if (newVal !== oldVal) {
        this.$emit('input', { emailField: newVal })
      }
    }
  },

  data () {
    return {
      emailField: null
    }
  },

  mounted () {
    if (!this.emailField && get(this.value, 'emailField', null)) {
      this.emailField = this.value.emailField
    } else {
      this.emailField = this.fields[0].id
    }
  }
}
</script>
