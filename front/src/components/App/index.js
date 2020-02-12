// == Import : npm
import React from 'react';
import PropTypes from 'prop-types';

// == Import : local
import './app.scss';
import Header from 'src/containers/Header';
import Page from 'src/containers/Page';
import Footer from 'src/containers/Footer';


// == Composant
class App extends React.Component {
  componentDidMount() {
    // appel à l'API pour initialiser les données
    const { fetchAreas } = this.props;
    fetchAreas();
  }

  render() {
    return (
      <div id="app">
        <Header />
        <Page />
        <Footer />
      </div>
    );
  }
}

App.propTypes = {
  fetchAreas: PropTypes.func.isRequired,
};

// == Export
export default App;
