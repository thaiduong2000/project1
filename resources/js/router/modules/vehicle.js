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
      name: "ListVehiecles",
      component: Vehicle,
    },
    {
      path: "create",
      name: "CreateVehiecles",
      component: Create,
    },
    {
      path: "update/:id",
      name: "UpdateVehicles",
      component: Update,
    },
  ],
}

export default userRoutes;