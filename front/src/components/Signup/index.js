import React from 'react';
import PropTypes from 'prop-types';
import { Button, Form } from 'semantic-ui-react';

import { Redirect } from 'react-router-dom';

import './signup.scss';

const Signup = ({
  usernameValue, emailValue, passwordValue, passwordVerifyValue, changeInputValue, newUser, logged,
}) => {
  const handleChange = (evt) => {
    const { value: fieldValue } = evt.target;
    const fieldName = evt.target.id;
    changeInputValue(fieldValue, fieldName);
  };

  const handleSubmit = (evt) => {
    evt.preventDefault();
    newUser();
  };

  if (logged) {
    // Affichage de la redirection
    return <Redirect to="/" />;
  }

  return (
    <div id="container">
      <Form id="form" onSubmit={handleSubmit}>
        <h1>Formulaire d'inscription</h1>
        <Form.Field>
          <label htmlFor="username">
          Choisissez un pseudonyme
            <Form.Input
              type="text"
              icon="user"
              iconPosition="left"
              placeholder="Votre pseudonyme"
              id="username"
              name="username"
              value={usernameValue}
              onChange={handleChange}
            />
          </label>
        </Form.Field>
        <Form.Field>
          <label htmlFor="email">
          Saisissez votre email
            <Form.Input
              type="email"
              icon="mail"
              iconPosition="left"
              placeholder="Votre email"
              id="email"
              name="email"
              value={emailValue}
              onChange={handleChange}
            />
          </label>
        </Form.Field>
        <Form.Field>
          <label htmlFor="password">
          Saisissez votre mot de passe
            <Form.Input
              type="password"
              icon="lock"
              iconPosition="left"
              placeholder="Votre mot de passe"
              id="password"
              name="password"
              value={passwordValue}
              onChange={handleChange}
            />
          </label>
        </Form.Field>
        <Form.Field>
          <label htmlFor="password">
          Confirmez votre mot de passe
            <Form.Input
              type="password"
              icon="lock"
              iconPosition="left"
              placeholder="Confirmez votre mot de passe"
              id="passwordVerify"
              name="passwordVerify"
              value={passwordVerifyValue}
              onChange={handleChange}
            />
          </label>
        </Form.Field>
        <Button type="submit" color="teal">Inscrivez-vous</Button>
      </Form>
    </div>
  );
};

Signup.propTypes = {
  usernameValue: PropTypes.string.isRequired,
  emailValue: PropTypes.string.isRequired,
  passwordValue: PropTypes.string.isRequired,
  passwordVerifyValue: PropTypes.string.isRequired,
  changeInputValue: PropTypes.func.isRequired,
  newUser: PropTypes.func.isRequired,
  logged: PropTypes.bool.isRequired,
};

export default Signup;
