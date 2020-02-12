// Import NPM
import React, { Component } from 'react';
import { Link } from 'react-router-dom';
import { Menu } from 'semantic-ui-react';
import { FaFacebookF, FaTwitter, FaInstagram } from 'react-icons/fa';
import Logo from '../../assets/logo_contour.svg';

// Import local
import './footer.scss';

export default class Footer extends Component {
  state = {}

  handleItemClick = (e, { name }) => this.setState({ activeItem: name })

  render() {
    const { activeItem } = this.state;

    return (
      <Menu stackable id="footer">
        <Menu.Item
          as={Link}
          to="/"
          title="Retour à l'acceuil"
        >
          <img src={Logo} alt="logo prendre l'aire" />
        </Menu.Item>

        <Menu.Item
          as={Link}
          to="/contact"
          name="Contact"
          active={activeItem === 'Contact'}
          onClick={this.handleItemClick}
        >
        Contact
        </Menu.Item>

        <Menu.Item
          as={Link}
          to="/team"
          name="Qui sommes-nous"
          active={activeItem === 'Qui sommes-nous'}
          onClick={this.handleItemClick}
        >
        Qui sommes-nous
        </Menu.Item>

        <Menu.Item
          as={Link}
          to="/legalmentions"
          name="Mentions Légales"
          active={activeItem === 'Mentions Légales'}
          onClick={this.handleItemClick}
        >
        Mentions Légales
        </Menu.Item>

        <Menu.Menu
          position="right"
        >
          <Menu.Item
            href="https://fr-fr.facebook.com/"
          >
            <FaFacebookF />
          </Menu.Item>

          <Menu.Item
            href="https://twitter.com/"
          >
            <FaTwitter />
          </Menu.Item>

          <Menu.Item
            href="https://www.instagram.com/"
          >
            <FaInstagram />
          </Menu.Item>
        </Menu.Menu>
      </Menu>
    );
  }
}
