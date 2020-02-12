import React from 'react';
import { Button, Dropdown, Form } from 'semantic-ui-react';

import './contact.scss';

const objectOptions = [
  {
    key: 'objet1',
    text: 'objet1',
    value: 'objet1',
  },
  {
    key: 'objet2',
    text: 'objet2',
    value: 'objet2',
  },
  {
    key: 'objet3',
    text: 'objet3',
    value: 'objet3',
  },
  {
    key: 'objet4',
    text: 'objet4',
    value: 'objet4',
  },
  {
    key: 'objet5',
    text: 'objet5',
    value: 'objet5',
  },
  {
    key: 'objet6',
    text: 'objet6',
    value: 'objet6',
  },
];

const Contact = () => (
  <div id="container">
    <Form id="form">
      <h1>Formulaire de contact</h1>
      <Form.Field className="field">
        <label className="label">Saisissez votre nom :</label>
        <input placeholder='name' />
      </Form.Field>
      <Form.Field className="field">
        <label className="label">Saisissez votre adresse e-mail :</label>
        <input placeholder='e-mail' />
      </Form.Field>
      <Form.Field className="field">
        <label className="label">Objet :</label>
        <Dropdown
          placeholder="Quel est l'objet de votre message ?"
          fluid
          selection
          options={objectOptions}
        />
      </Form.Field>
      <Form.Field className="field">
        <label className="label">Votre message :</label>
        <textarea placeholder="..." />
      </Form.Field>
      <Button type="submit" color="teal">Envoyer</Button>
    </Form>
  </div>
);

export default Contact;
