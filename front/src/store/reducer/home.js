
// --- action types
import { CHANGE_INDEX } from '../actions';

// --- initial state
const initialState = {
  highways: [],
  activeIndex: 0,
};
// --- Reducer
const reducer = (state = initialState, action = {}) => {
  switch (action.type) {
    case CHANGE_INDEX:
      return {
        ...state,
        activeIndex: -1,
      };

    default: return state;
  }
};

export default reducer;
