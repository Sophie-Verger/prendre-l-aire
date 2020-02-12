import axios from 'axios';

import {
  FETCH_AREAS_DATA,
  FETCH_HIGHWAYS_DATA,
  receiveAreasData,
  stopLoading,
} from '../actions';


const areaMiddleware = (store) => (next) => (action) => {
  switch (action.type) {
    case FETCH_AREAS_DATA:
      // appel axios
      axios.get('http://54.85.18.78/projet-prendre-l-aire/back/public/index.php/api/v1/areas/')
        .then((response) => {
          const receiveDataAction = receiveAreasData(response.data);
          store.dispatch(receiveDataAction);
        })
        .catch((error) => {
          // console.error permet d'afficher une erreur dans la console
          console.error(error);
        })
        .finally(() => {
          const stopLoadingAction = stopLoading();
          store.dispatch(stopLoadingAction);
        });
      break;

    case FETCH_HIGHWAYS_DATA:
      // appel axios
      axios.get('http://54.85.18.78/projet-prendre-l-aire/back/public/index.php/api/v1/highways/')
        .then((response) => {
          const receiveDataAction = receiveAreasData(response.data);
          store.dispatch(receiveDataAction);
        })
        .catch((error) => {
          // console.error permet d'afficher une erreur dans la console
          console.error(error);
        })
        .finally(() => {
          const stopLoadingAction = stopLoading();
          store.dispatch(stopLoadingAction);
        });
      break;

    default:
      // je laisse passer les autres actions
      next(action);
  }
};

export default areaMiddleware;
