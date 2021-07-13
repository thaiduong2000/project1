import Vehicle from '../../views/vehicles/List'
import Create from '../../views/vehicles/Create'
import Update from '../../views/vehicles/Update'

const Layout = {
  template: "<router-view />",
};

const userRoutes =
{
  path: '/vehicles',
  name: 'Vehicles',
  component: Layout,
  children: [
    {
      path: "",
      name: "list.vehicles",
      component: Vehicle,
    },
    {
      path: "create",
      name: "create.vehicles",
      component: Create,
    },
    {
      path: "update",
      name: "update.vehicles",
      component: Update,
    },
  ],
}

export default userRoutes;