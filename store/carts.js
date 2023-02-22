export const state = () => ({
  items: [],
})

export const mutations = {
  addItem(state, id) {
    state.items.push({
      id: id,
      quantity: 1
    })
  }
}

export const actions = {
  addToCart({ commit, state }, id) {
    commit('addItem', id)
    console.log(state.items);
    // const item = state.items.find(item => item.id === id)
    // if (item) {
    //   item.quantity++
    // } else {
    //   commit('addItem', id)
    // }
  }
}

