import React from 'react';
import PropTypes from 'prop-types';
import {
  Map, TileLayer, Marker, Popup,
} from 'react-leaflet';
import {
  Dimmer, Loader, Segment, Button,
} from 'semantic-ui-react';
import { Link } from 'react-router-dom';


import './maparea.scss';

const Maparea = ({
  lat, lng, zoom, areas, loading,
}) => {
  const position = [lat, lng];

  return (
    <Segment>
      {loading && (
      <Dimmer active inverted>
        <Loader inverted content="Chargement" />
      </Dimmer>
      )}
      <Map id="mapid" center={position} zoom={zoom}>
        <TileLayer
          attribution='&amp;copy <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
          url="https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png"
        />
        {!loading && areas.map((area) => (
          <Marker position={[area.latitude, area.longitude]} key={area.id}>
            <Popup>
            Nom de l'aire : {area.name} <br />
            Nom de l'autoroute : {area.highway.name} <br />
              <Button as={Link} to="/areas" size="mini" color="teal">Fiche détaillée</Button>
            </Popup>
          </Marker>
        ))}
      </Map>
    </Segment>

  );
};

Maparea.propTypes = {
  lat: PropTypes.string.isRequired,
  lng: PropTypes.string.isRequired,
  zoom: PropTypes.number.isRequired,
  areas: PropTypes.arrayOf(PropTypes.shape({
    id: PropTypes.number.isRequired,
    latitude: PropTypes.string.isRequired,
    longitude: PropTypes.string.isRequired,
    name: PropTypes.string.isRequired,
    highway: PropTypes.PropTypes.shape({
      name: PropTypes.string.isRequired,
    }).isRequired,
  })).isRequired,
  loading: PropTypes.bool.isRequired,
};

export default Maparea;
