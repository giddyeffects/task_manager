<template>
  <v-sidebar v-model="nav1" class="mt-0 scroll-y" :mobileBreakPoint="576" fixed>
    <v-list>
      <v-list-item >
        <v-list-tile>
          <v-list-tile-title class="subheader">Dashboard</v-list-tile-title>
        </v-list-tile>
      </v-list-item>
      <v-list-item >
        <v-list-tile>
          <v-list-tile-title>Tasks</v-list-tile-title>
        </v-list-tile>
      </v-list-item>
    </v-list>
  </v-sidebar>
</template>
<script>
    export default {
        data() {
            return {
                nav1: true
            }
        }
    }
</script>