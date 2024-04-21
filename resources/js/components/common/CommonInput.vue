<template>
     <div class="mt-1">
        <input type="text" name="{{ name }}" id="{{ id }}" class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" >
    </div>
</template>
<script>
export default {
  props: {
    name: String,
    id:String
  },
};
</script>