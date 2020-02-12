import { createStore, applyMiddleware, compose } from 'redux';

import signupMiddleware from 'src/store/middleware/signupMiddleware';
import loginMiddleware from 'src/store/middleware/loginMiddleware';
import areaMiddleware from 'src/store/middleware/areaMiddleware';

// on importe le reducer qui combine les autres
import reducer from './reducer';

const composeEnhancers = window.__REDUX_DEVTOOLS_EXTENSION_COMPOSE__ || compose;

const enhancers = composeEnhancers(
  applyMiddleware(
    signupMiddleware,
    loginMiddleware,
    areaMiddleware,
  ),
);

const store = createStore(
  reducer,
  enhancers,
);

export default store;
