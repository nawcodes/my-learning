export const state = () => ({
  items: [],
})

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

