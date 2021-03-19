<template>
  <img
    :src="url"
    :alt="alt"
    @load="onLoad"
    @error="onError"
  />
</template>

<script>
// @author https://github.com/JiriChara/vue-gravatar
import md5 from 'md5'

export default {
  name: 'gravatar-img',

  emits: [
    'load',
    'error'
  ],

  props: {
    email: {
      type: String,
      default: ''
    },

    hash: {
      type: String,
      default: ''
    },

    size: {
      type: Number,
      default: 80
    },

    defaultImg: {
      type: String,
      default: 'retro'
    },

    rating: {
      type: String,
      default: 'g'
    },

    alt: {
      type: String,
      default: 'Avatar'
    },

    protocol: {
      type: String,
      default: ''
    }
  },

  computed: {
    url() {
      const protocol = this.protocol.slice(-1) === ':'
        ? this.protocol
        : `${this.protocol}:`

      const img = [
        `${protocol === ':' ? '' : protocol}//www.gravatar.com/avatar/`,
        this.hash || md5(this.email.trim().toLowerCase()),
        `?s=${this.size}`,
        `&d=${this.defaultImg}`,
        `&r=${this.rating}`
      ]

      return img.join('')
    }
  },

  methods: {
    onLoad(...args) {
      this.$emit('load', ...args)
    },

    onError(...args) {
      this.$emit('error', ...args)
    }
  }
}
</script>
