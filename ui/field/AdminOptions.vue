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

    <template v-if="errorsList.length">
      <span v-for="error in errorsList" :key="error" class="border-red-700 block px-2 py-2 text-sm text-red-100 bg-red-500">
        {{ error }}
      </span>
    </template>
  </div>
</template>

<script>
import { get } from 'lodash'
import SelectField from '@/Adaptcms/Base/ui/components/Form/SelectField'

export default {
  props: [
    'modelValue',
    'field',
    'package',
    'errors',
    'fields'
  ],

  emits: [
    'update:modelValue'
  ],

  components: {
    SelectField
  },

  watch: {
    modelValue (newVal, oldVal) {
      if ((newVal !== oldVal) && get(newVal, 'emailField', null)) {
        this.emailField = newVal.emailField
      }
    },

    emailField (newVal, oldVal) {
      if (newVal !== oldVal) {
        this.$emit('update:modelValue', { emailField: newVal })
      }
    }
  },

  computed: {
    hasError () {
      let key = 'meta.emailField'

      return (typeof this.errors[key] !== 'undefined')
    },

    errorsList () {
      let key = 'meta.emailField'

      return (typeof this.errors[key] !== 'undefined' ? this.errors[key].messages : [])
    }
  },

  data () {
    return {
      emailField: null
    }
  },

  mounted () {
    if (!this.emailField && get(this.modelValue, 'emailField', null)) {
      this.emailField = this.modelValue.emailField
    } else {
      this.emailField = this.fields[0].id
    }
  }
}
</script>
