import React from 'react';
import PropTypes from 'prop-types';

import { Route, Switch, Redirect } from 'react-router-dom';

import Home from 'src/containers/Home';
import Signup from 'src/containers/Signup';
import Login from 'src/containers/Login';
import Area from 'src/components/Area';
import Team from 'src/components/Team';
import Profile from 'src/containers/Profile';
import Contact from 'src/components/Contact';

import users from 'src/data/users';

const Page = ({ logged }) => (
  <Switch>
    <Route exact path="/">
      <Home />
    </Route>
    <Route path="/areas"> {/* // <= Ajouter le slug dans l'url */}
      <Area />
    </Route>
    <Route path="/signup">
      <Signup />
    </Route>
    <Route path="/signin">
      <Login />
    </Route>
    <Route path="/team">
      <Team />
    </Route>
    <Route path="/contact">
      <Contact />
    </Route>
    {/* Switch => on s'arrête à la première route qui a "path" qui correspond à l'URL. La ligne suivante protège toutes nos routes privées */}
    {!logged && <Redirect to="/" />}
    {/* "logged &&" est important ici, sinon l'utilisateur non connecté a accès à cette page à partir de l'URL (n'est pas indispensable si on a Redirect au-dessus, mais évitera des problèmes de sécurité si on enlève Redirect) */}
    {logged && (
    <Route path="/profile">
      <Profile user={users[0]} />
    </Route>
    )}
    <Route>
      <div>Page non trouvée</div>
    </Route>
  </Switch>
);

Page.propTypes = {
  logged: PropTypes.bool.isRequired,
};

export default Page;
