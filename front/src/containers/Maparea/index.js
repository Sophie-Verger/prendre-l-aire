import { connect } from 'react-redux';

import Maparea from 'src/components/Maparea';


const mapStateToProps = (state) => ({
  lat: state.map.position.lat,
  lng: state.map.position.lng,
  zoom: state.map.position.zoom,
  markerlat: state.map.marker.lat,
  markerlng: state.map.marker.lng,
  areas: state.map.areas,
  loading: state.map.loading,
});

const mapDispatchToProps = () => ({
});

const MapareaContainer = connect(
  mapStateToProps,
  mapDispatchToProps,
)(Maparea);

export default MapareaContainer;
