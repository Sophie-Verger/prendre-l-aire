import React from 'react'
import { Container, Card, Header, Image } from 'semantic-ui-react'
import Kevin from './../../assets/team/team_kevin_dubuy.png'
import { FaLinkedinIn, FaTwitter, FaGithub } from 'react-icons/fa';

import './team.scss';

const Team = () => (
  <Container id='team'>
    <Header id='pageTitle' as='h1'>Qui sommes-nous ?</Header>
    <Card.Group id='cards'>
      {/* Team member card */}
      <Card className="card">
        <Image src={Kevin} wrapped ui={false} />
        <Card.Content>
          <Card.Header>Kevin Dubuy</Card.Header>
          <Card.Description>
            <p className='job'>Développeur web Full Stack</p>
            <p className='role'>Product Owner</p>
            <p className='description'>Lorem ipsum dolor sit amet</p>
          </Card.Description>
        </Card.Content>
        <Card.Content extra>
          <a href="https://www.linkedin.com/in/dubuykevin/"><FaLinkedinIn className="social" /></a>
          <a href="https://www.twitter.com/kiveun"><FaTwitter className="social" /></a>
          <a href="https://www.github.com/kevin-dubuy"><FaGithub className="social" /></a>
        </Card.Content>
      </Card>
      {/* End of team member card */}

      {/* Team member card */}
      <Card>
        <Image src={Kevin} wrapped ui={false} />
        <Card.Content>
          <Card.Header>Kevin Dubuy</Card.Header>
          <Card.Description>
            <p className='job'>Développeur web Full Stack</p>
            <p className='role'>Product Owner</p>
            <p className='description'>Lorem ipsum dolor sit amet</p>
          </Card.Description>
        </Card.Content>
        <Card.Content extra>
          <a href="https://www.linkedin.com/in/dubuykevin/"><FaLinkedinIn className="social" /></a>
          <a href="https://www.twitter.com/kiveun"><FaTwitter className="social" /></a>
          <a href="https://www.github.com/kevin-dubuy"><FaGithub className="social" /></a>
        </Card.Content>
      </Card>
      {/* End of team member card */}

      {/* Team member card */}
      <Card>
        <Image src={Kevin} wrapped ui={false} />
        <Card.Content>
          <Card.Header>Kevin Dubuy</Card.Header>
          <Card.Description>
            <p className='job'>Développeur web Full Stack</p>
            <p className='role'>Product Owner</p>
            <p className='description'>Lorem ipsum dolor sit amet</p>
          </Card.Description>
        </Card.Content>
        <Card.Content extra>
          <a href="https://www.linkedin.com/in/dubuykevin/"><FaLinkedinIn className="social" /></a>
          <a href="https://www.twitter.com/kiveun"><FaTwitter className="social" /></a>
          <a href="https://www.github.com/kevin-dubuy"><FaGithub className="social" /></a>
        </Card.Content>
      </Card>
      {/* End of team member card */}

      {/* Team member card */}
      <Card>
        <Image src={Kevin} wrapped ui={false} />
        <Card.Content>
          <Card.Header>Kevin Dubuy</Card.Header>
          <Card.Description>
            <p className='job'>Développeur web Full Stack</p>
            <p className='role'>Product Owner</p>
            <p className='description'>Lorem ipsum dolor sit amet</p>
          </Card.Description>
        </Card.Content>
        <Card.Content extra>
          <a href="https://www.linkedin.com/in/dubuykevin/"><FaLinkedinIn className="social" /></a>
          <a href="https://www.twitter.com/kiveun"><FaTwitter className="social" /></a>
          <a href="https://www.github.com/kevin-dubuy"><FaGithub className="social" /></a>
        </Card.Content>
      </Card>
      {/* End of team member card */}

      {/* Team member card */}
      <Card>
        <Image src={Kevin} wrapped ui={false} />
        <Card.Content>
          <Card.Header>Kevin Dubuy</Card.Header>
          <Card.Description>
            <p className='job'>Développeur web Full Stack</p>
            <p className='role'>Product Owner</p>
            <p className='description'>Lorem ipsum dolor sit amet</p>
          </Card.Description>
        </Card.Content>
        <Card.Content extra>
          <a href="https://www.linkedin.com/in/dubuykevin/"><FaLinkedinIn className="social" /></a>
          <a href="https://www.twitter.com/kiveun"><FaTwitter className="social" /></a>
          <a href="https://www.github.com/kevin-dubuy"><FaGithub className="social" /></a>
        </Card.Content>
      </Card>
      {/* End of team member card */}
    </Card.Group>
  </Container>
  
);

export default Team;
