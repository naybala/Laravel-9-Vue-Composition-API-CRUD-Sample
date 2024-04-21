<template>
    <label for="{{ for }}" class="block text-sm font-medium text-gray-700">
        {{ title }}
    </label>
</template>
<script>
export default {
  props: {
    title: String,
    for:String
  },
};
</script>