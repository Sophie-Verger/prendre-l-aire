// reducer pour gérer les données relatives à la carte
// --- action types
import {
  NEW_POSITION,
  NEW_MARKER,
  RECEIVE_AREAS_DATA,
  STOP_LOADING,
} from '../actions';
// --- initial state
const initialState = {
  position: {
    lat: '46.1314298',
    lng: '1.5424725',
    zoom: 5,
  },

  marker: {
    lat: 45.763818,
    lng: 4.835464,
  },

  areas: [],

  loading: true,
};
// --- Reducer
const reducer = (state = initialState, action = {}) => {
  switch (action.type) {
    case RECEIVE_AREAS_DATA:
      return {
        ...state,
        areas: action.areas,
      };
    case STOP_LOADING:
      return {
        ...state,
        loading: false,
      };
    case NEW_POSITION:
      return {
        ...state,
        [action.name]: action.value,
      };
    case NEW_MARKER:
      return {
        ...state,
        [action.name]: action.value,
      };
    default: return state;
  }
};
// --- export
export default reducer;
