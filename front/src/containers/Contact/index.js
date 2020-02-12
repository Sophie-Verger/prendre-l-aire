import { connect } from 'react-redux';

import Contact from 'src/components/Contact';


const mapStateToProps = () => ({
});

const mapDispatchToProps = () => ({
});

const ContactContainer = connect(
  mapStateToProps,
  mapDispatchToProps,
)(Contact);

export default ContactContainer;