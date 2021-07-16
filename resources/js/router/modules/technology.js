import Technology from '../../views/technologies/List'
import Create from '../../views/technologies/Create'
import Update from '../../views/technologies/Update'

const Layout = {
  template: "<router-view />",
};

const technologyRoutes =
{
  path: '/technologies',
  name: 'Technologies',
  component: Layout,
  children: [
    {
      path: "",
      name: "ListTechnology",
      component: Technology,
    },
    {
      path: "create",
      name: "CreateTechnology",
      component: Create,
    },
    {
      path: "update",
      name: "UpdateTechnology",
      component: Update,
    },
  ],
}

export default technologyRoutes;