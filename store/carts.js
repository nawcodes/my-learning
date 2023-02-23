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
  }
}

