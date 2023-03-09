export const state = () => ({
  items: [],
  additionals: [
    {
      title: 'Tax',
      mode: 'percentage',
      value: 10,  
    },
    {
      title: 'Service Charge',
      mode: 'fix',
      value: 5000,  
    },

  ]
})

export const getters = {
  cartItems: (state, getters, rootState) => {
    return state.items.map(({id, quantity}) => {
      let product = rootState.products.products.find(product => product.id === id)

      return {
        id: product.id,
        title: product.title,
        price: product.price,
        quantity: quantity,
      }

    });
  },
  itemTotal: () => (price, quantity) => {
    return price * quantity
  },
  subTotal(state, getters) {
    return getters.cartItems.reduce((total, item) => {
      return total + (item.price * item.quantity)
    }, 0)
  },
  calculatePercentage: (state, getters) => (value) => {
     return getters.subTotal * (value / 100)
  },
  sumAddioanals: (state, getters) => {
    if(state.additionals.length) {
      return state.additionals.reduce((total, item) => {
        if(item.mode === 'percentage') {
          return total + getters.calculatePercentage(item.value)
        }

        return total + item.value
      }, 0)
    }
  },
  total: (state, getters) => {
    return getters.subTotal + getters.sumAddioanals
  }
}

export const mutations = {
  addItem(state, id) {
    state.items.push({
      id: id,
      quantity: 1
    })
  },
  incrementQuantity(state, id) {
    state.items.find(item => item.id === id).quantity++
  },
  decrementQuantity(state, id) {
    let item = state.items.find(item => item.id === id)
    if (item.quantity > 1) {
      item.quantity--
    }
  },
  removeItem(state, id) {
    let itemId = state.items.findIndex(item => item.id === id)
    confirm('Are you sure you want to remove this item?');
    state.items.splice(itemId, 1)
  },

}

export const actions = {
  addToCart({ commit, state }, id) {
    const item = state.items.find(item => item.id === id)
    if (item) {
      commit('incrementQuantity', id)
    } else {
      commit('addItem', id)
    }
  },
  increment({ commit }, id) {
    commit('incrementQuantity', id)
  },
  decrement({ commit }, id) {
    commit('decrementQuantity', id)
  },
  remove({ commit }, id) {
    commit('removeItem', id)
  },
  subTotal({ commit, getters }) {
    commit('subTotal', getters)
  }
}

