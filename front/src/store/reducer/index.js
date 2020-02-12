import { combineReducers } from 'redux';

// j'importe mes reducers
import user from './user';
import form from './form';
import home from './home';
import map from './map';

// l'intérêt d'avoir plusieurs reducers est de classer les informations par catégorie,
// plus facile pour s'y retrouver

// je veux combiner mes reducers en un seul, puisque le store gère un seul reducer
// combineReducers retourne un objet
// https://redux.js.org/api/combinereducers/
const reducer = combineReducers({
  // user: user,
  user,
  form,
  home,
  map,
});

export default reducer;
