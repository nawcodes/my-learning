export const state = () => ({
  items: [],
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
  }
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
  }
}

