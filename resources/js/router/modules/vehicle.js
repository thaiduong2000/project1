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
      name: "ListVehicle",
      component: Vehicle,
    },
    {
      path: "create",
      name: "CreateVehiecle",
      component: Create,
    },
    {
      path: "update/:id",
      name: "UpdateVehicle",
      component: Update,
    },
  ],
}

export default userRoutes;