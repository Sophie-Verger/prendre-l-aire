import axios from 'axios';

import { DO_LOGIN, logUser } from 'src/store/actions';


const loginMiddleware = (store) => (next) => (action) => {
  switch (action.type) {
    case DO_LOGIN: {
      // console.log(user);

      // Ouvrir une connexion avec le serveur
      axios.post('http://54.85.18.78/projet-prendre-l-aire/back/public/index.php/api/v1/login_check', {
        username: (store.getState().form.email),
        password: (store.getState().form.password),
      })
      // succès
        .then((response) => {
        // Dispatch d'une action pour changer le user
        // store.dispatch(changeUserName(response.data));
          console.log('Response', response);
          store.dispatch(logUser(response.data.logged));
        })
      // Erreur
        .catch((error) => {
          console.log('Error', error);
        })
      // Dans tous les cas
        .finally();

      break;
    }

    default:
      next(action);
      break;
  }
};

export default loginMiddleware;
