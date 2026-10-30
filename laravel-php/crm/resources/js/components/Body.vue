<template>
    <div id="body">
        <LeftBody />
        <RightBody />

    </div>
</template>

<script>
import Body from './Body'
import LeftBody from './LeftBody.vue'
import RightBody from './RightBody.vue'

export default {
    components:{
        Body,
    }
  
}
</script>
