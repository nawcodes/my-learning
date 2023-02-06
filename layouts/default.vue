<template>
  <v-app dark>
    <v-navigation-drawer
      v-model="drawer"
      fixed
      app
    >
      <v-list>
        <v-list-item
          v-for="(item, i) in sideMenu"
          :key="i"
          :to="item.to"
          router
          exact
        >
          <v-list-item-action>
            <v-icon>{{ item.icon }}</v-icon>
          </v-list-item-action>
          <v-list-item-content>
            <v-list-item-title>{{ item.title }}</v-list-item-title>
          </v-list-item-content>
        </v-list-item>
      </v-list>
    </v-navigation-drawer>
    <v-app-bar
      fixed
      app
    >
      <v-toolbar-title>{{ title }}</v-toolbar-title>
      <v-spacer />

    </v-app-bar>
    <v-main>
      <v-container>
        <Nuxt />
      </v-container>
    </v-main>

    <v-bottom-navigation horizontal fixed height="10vh" app >
      <v-app-bar-nav-icon @click.stop="drawer = !drawer" v-ripple="false" plain/>
        <v-btn
          v-for="(item, i) in bottomMenu"
          :key="i"
          :to="item.to"
          v-ripple="false"
          plain

        >
          <span> {{ item.title }}</span>
          <v-icon>{{ item.icon }}</v-icon>
        </v-btn>
        <v-spacer></v-spacer>
      </v-app-bar-nav-icon>
    </v-bottom-navigation>

  </v-app>
</template>

<script>
export default {
  name: 'DefaultLayout',
  data () {
    return {
      drawer: false,
      sideMenu: [
        {
          icon: 'mdi-account',
          title: 'Account',
          to: '/account'
        },
        {
          icon: 'mdi-bell',
          title: 'Notification',
          to: '/notification'
        }
      ],
      bottomMenu: [
        {
          icon: 'mdi-application',
          title: 'App',
          to: '/'
        },

      ],
      title: 'Cashier'
    }
  }
}
</script>
