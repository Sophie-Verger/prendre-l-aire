// Import NPM
import React from 'react';
import PropTypes from 'prop-types';
import {
  Accordion,
  Icon,
  Dropdown,
  Menu,
  Button,
} from 'semantic-ui-react';
// Import local
import './home.scss';
import Maparea from 'src/containers/Maparea';


const Home = ({ highways, activeIndex, changeIndexValue }) => {

  const handleClick = () => {
    // const newIndex = activeIndex === index ? -1 : index;

    changeIndexValue(activeIndex);
  };

  const areaOptions = highways.forEach((highway) => [
    {
      key: highway.id,
      text: highway.name,
      value: highway.name,
    },
  ]);

  return (
    <>
      {/* // Composant Accordéon de Semantic UI pour la description */}
      <h1>Page d'accueil</h1>
      <Accordion fluid styled id="description">
        <Accordion.Title
          active={activeIndex}
          onClick={handleClick}
        >
          <Icon name="dropdown" />
        Qu'est ce que Prendre l'aire?
        </Accordion.Title>
        <Accordion.Content active={activeIndex}>
          <p>
          Lorem ipsum dolor sit amet.
          </p>
        </Accordion.Content>
      </Accordion>

      <Menu secondary>
        <Dropdown
          placeholder="Selectionner une autoroute"
          fluid
          selection
          options={areaOptions}
          id="highwayslist"
        />
        <Menu.Menu position="right">
          <Button id="crosshair" icon="crosshairs" color="teal" title="Trouver les aires à proximité de ma position" />
        </Menu.Menu>
      </Menu>

      <Maparea />
    </>
  );
};

Home.propTypes = {
  activeIndex: PropTypes.number.isRequired,
  highways: PropTypes.arrayOf(PropTypes.shape({
    id: PropTypes.number.isRequired,
    name: PropTypes.string.isRequired,
    areas: PropTypes.PropTypes.shape({
      id: PropTypes.number.isRequired,
      name: PropTypes.string.isRequired,
      direction: PropTypes.string.isRequired,
    }).isRequired,
  })).isRequired,
  changeIndexValue: PropTypes.func.isRequired,
};

export default Home;
