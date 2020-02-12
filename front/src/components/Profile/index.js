import React from 'react';
import PropTypes from 'prop-types';
import {
  Container, Image, Segment, Grid, Button, Icon,
} from 'semantic-ui-react';

import './profile.scss';

const Profile = ({
  username, email,
}) => (
  <Container>
    <h1>Mon profil</h1>
    <Segment>

      <Grid columns={3} stackable centered>
        <Grid.Row verticalAlign="middle">
          <Grid.Column width={3} textAlign="center">
            <Image className="avatar" src="https://react.semantic-ui.com/images/avatar/large/matthew.png" centered circular />
          </Grid.Column>
          <Grid.Column id="info" width={5} textAlign="left">
            <p>Bonjour {username} !</p>
            <p>{email}</p>
          </Grid.Column>
          <Grid.Column width={4} textAlign="center">
            <Button animated color="red">
              <Button.Content visible>Modifier mon profil</Button.Content>
              <Button.Content hidden>
                <Icon name="pencil alternate" />
              </Button.Content>
            </Button>
            <Button animated color="teal">
              <Button.Content visible>Supprimer mon compte</Button.Content>
              <Button.Content hidden>
                <Icon name="trash" />
              </Button.Content>
            </Button>
          </Grid.Column>
        </Grid.Row>
      </Grid>

      <h2 id="commentsTitle">Mes commentaires</h2>

      <Grid divided="vertically">
        <Grid.Row columns={2}>
          <Grid.Column>
            <Image className="comment" src="https://react.semantic-ui.com/images/wireframe/paragraph.png" />
          </Grid.Column>
          <Grid.Column>
            <Image className="comment" src="https://react.semantic-ui.com/images/wireframe/paragraph.png" />
          </Grid.Column>
        </Grid.Row>

        <Grid.Row columns={3}>
          <Grid.Column>
            <Image className="comment" src="https://react.semantic-ui.com/images/wireframe/paragraph.png" />
          </Grid.Column>
          <Grid.Column>
            <Image className="comment" src="https://react.semantic-ui.com/images/wireframe/paragraph.png" />
          </Grid.Column>
          <Grid.Column>
            <Image className="comment" src="https://react.semantic-ui.com/images/wireframe/paragraph.png" />
          </Grid.Column>
        </Grid.Row>
      </Grid>

    </Segment>
  </Container>
);

Profile.propTypes = {
  username: PropTypes.string.isRequired,
  name: PropTypes.string.isRequired,
  email: PropTypes.string.isRequired,
  avatar: PropTypes.string.isRequired,
};

export default Profile;
